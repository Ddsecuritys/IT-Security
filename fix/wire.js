const WebSocket = require('ws');
const pcap = require('pcap');
const http = require('http');
const fs = require('fs');
const url = require('url');

const wss = new WebSocket.Server({ port: 8080 });
const pcapSession = pcap.createSession('', 'ip');

let capturedPackets = [];

wss.on('connection', (ws) => {
    console.log('Client connected');

    pcapSession.on('packet', (rawPacket) => {
        const packet = pcap.decode.packet(rawPacket);

        // Extract relevant packet information
        const source = packet.payload.payload.payload.saddr;
        const destination = packet.payload.payload.payload.daddr;
        const protocol = packet.payload.payload.payload.protocol;
        const length = packet.payload.payload.payload.pcap_length;
        const timestamp = new Date().toISOString();

        const packetData = { source, destination, protocol, length, timestamp };
        capturedPackets.push(packetData);

        // Send packet data to connected WebSocket client
        ws.send(JSON.stringify(packetData));
    });

    ws.on('close', () => {
        console.log('Client disconnected');
    });
});

// HTTP endpoint to download captured packets
http.createServer((req, res) => {
    if (req.url === '/download') {
        res.setHeader('Content-Type', 'text/csv');
        res.setHeader('Content-Disposition', 'attachment; filename=captured_packets.csv');

        const csvRows = [
            'Source,Destination,Protocol,Length,Timestamp',
            ...capturedPackets.map(packet => `${packet.source},${packet.destination},${packet.protocol},${packet.length},${packet.timestamp}`)
        ];

        res.end(csvRows.join('\n'));
    } else {
        res.writeHead(404);
        res.end('Not found');
    }
}).listen(3000);

console.log('WebSocket server running on ws://localhost:8080');
console.log('Download captured packets at http://localhost:3000/download');
