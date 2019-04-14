Es muss die global_conf.json am Gateway angepasst werden um die Daten auch an einen eigenen Server zu schicken z.b.:

```
[...]
        "gateway_conf": {
                "gateway_ID": "B8XXXXXX",
                "servers":
                [ {
                        "server_address": "router.eu.thethings.network",
                        "serv_port_up": 1700,
                        "serv_port_down": 1700,
                        "serv_enabled": true
                },
                {
                        "server_address":"10.XXX.XXX.XXX",
                        "serv_port_up":1700,
                        "serv_port_down":1700,
                        "serv_enabled":true
                }
                ]
        }
[...]
```

es scheinen nur DNS Server mit A Rekord oder IPv4 Adressen zu gehen. IPv6 scheint der Packet Forwarder nicht zu fressen.

Auf dem Zielserver können die Pakete dann mit dem PHP Script abgefangen werden und weiter verarbeitet (z.b. in eine influxdb schreiben und mit Grafana anzeigen) werden. Das PHP Script muss dauerhaft laufen, auf der Konsole z.b. mit php get.php starten und laufen lassen. 
