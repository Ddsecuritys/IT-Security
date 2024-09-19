const express = require('express');
const os = require('os');
const network = require('network');

const app = express();
const port = 3000;

app.get('/network-info', (req, res) => {
    network.get_active_interface((err, iface) => {
        if (err) {
            return res.status(500).send('Error fetching network information');
        }

        const networkInfo = {
            ip_address: iface.ip_address,
            mac_address: iface.mac_address,
            gateway_ip: iface.gateway_ip,
            netmask: iface.netmask,
            type: iface.type,
            ssid: iface.ssid,
            bssid: iface.bssid,
            signal_level: iface.signal_level,
            security: iface.security,
        };

        res.json(networkInfo);
    });
});

app.use(express.static('public'));

app.listen(port, () => {
    console.log(`Server running at http://localhost:${3000}`);
});
