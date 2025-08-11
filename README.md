🕷️ Wednesday CTF: Secrets of Nevermore

At Nevermore Academy, whispers of dark secrets echo through locked 🔒 servers and forbidden files.
As an undercover student 🕵️‍♂️, your mission is to infiltrate the academy’s internal portal, exploit chained vulnerabilities 🛠️, and uncover the truth hidden within.
Slip past the student login with 💉 SQL Injection, snoop forbidden diaries via 🗝️ IDOR to claim your first flag 🚩, plant a Stored XSS payload to trick the headmistress into leaking her session 🍪, and finally unleash 💻 Command Injection to open the administration vault and retrieve the second flag 🏆.
The deeper you dig, the stranger and more dangerous—Nevermore becomes.


🎯 Game Objective
- 2 Main Flags 🚩🏆 hidden inside the portal.
- Must chain 4 vulnerabilities 🛠️ to retrieve both.
- Solve in sequence to progress 🔐.

🕳️ Vulnerabilities:
- 💉 SQL Injection (Login Bypass) — Gain student-level access.
- 🗝️ IDOR — Access another student’s diary 📓 and get Flag 1 🚩.
- 🕸️ Stored XSS — Capture the headmistress’s session 🍪.
- 💻 Command Injection — Execute server commands 🖥️ to retrieve Flag 2 🏆.

⚙️ Technology Stack
- Language: 🐘 PHP 
- Database: 🗄️ MySQL 
- Web Server: 🌐 Apache
- Containerization: 📦 Docker & Docker Compose


