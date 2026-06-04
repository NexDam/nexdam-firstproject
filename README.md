# NexDam First Project Server Dashboard

![NexDam](https://img.shields.io/badge/NexDam-Secure%20Web%20Infrastructure-blue)
![License](https://img.shields.io/badge/license-MIT-green)
![Status](https://img.shields.io/badge/status-active-brightgreen)

> A lightweight web-based server management dashboard built with HTML, CSS and JavaScript.

---

## 📋 Overview

NexDam Server Dashboard is a web interface that allows you to manage and monitor your server directly from the browser. It includes a public-facing homepage and a protected admin panel with real-time server control capabilities.

---

## ✨ Features

- 🏠 **Homepage** — Public landing page presenting the project
- 🔐 **Admin Panel** — Protected area for server management
- 🐳 **Docker Management** — Start, stop and monitor Docker containers
- ⚙️ **Apache2 Control** — Manage the Apache2 web server
- 💻 **Terminal Emulator** — Execute server commands directly from the browser
- 📊 **Server Monitoring** — Real-time server status overview

---

## 🛠️ Tech Stack

| Technology | Purpose |
|------------|---------|
| HTML5 | Structure |
| CSS3 | Styling |
| JavaScript | Interactivity |
| Apache2 | Web server |
| Docker | Containerization |

---
## 🚀 Getting Started

### Prerequisites

- Apache2 or any web server
- Docker (optional)
- A modern browser

### Installation

```bash
# Clone the repository
git clone https://github.com/NexDam/nexdam-firstproject.git

# Navigate to the project
cd nexdam-firstproject

# Deploy on Apache2
sudo cp -r . /var/www/html/
```

---

## 🔒 Security

The admin panel is protected and should not be exposed publicly without proper authentication. It is recommended to use **Cloudflare Zero Trust** or `.htaccess` to restrict access.

---

## 👤 Author

- Website: [nexdam.it](https://nexdam.it)
- GitHub: [@NexDam](https://github.com/NexDam)
- DEV.to: [dev.to/nexdam](https://dev.to/nexdam)

---

## 📄 License

Copyright © 2026 NexDam. All rights reserved.

---

*Built with ❤️ by [NexDam](https://nexdam.it) — Secure Web Infrastructure & Development*
