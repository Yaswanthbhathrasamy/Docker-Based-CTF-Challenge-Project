🕷️ Wednesday CTF: Secrets of Nevermore
At Nevermore Academy, rumors of forbidden experiments whisper through locked 🔒 servers and encrypted ledgers. As an undercover student 🕵️‍♂️, you must infiltrate the academy’s internal portal, unravel hidden trails 🛠️, and expose the truth buried deep within.

Slip past the portal defenses with 💉 SQL Injection, using the academy’s own information_schema to uncover usernames and passwords. Once inside, exploit 🗝️ IDOR to read another student’s private diary and claim your first flag 🚩. But the secrets run deeper — in the profile’s “project submission” area lies an insecure file upload 📤, where you can smuggle malicious code into the server. With shell access, discover a strange SUID binary 🧩, exploit it for privilege escalation, and seize control of the system to retrieve the final root flag 🏆

🎯 Game Objective
- 2 Main Flags 🚩🏆 hidden in the system.
- Must chain 4 vulnerabilities 🛠️ to retrieve both.
- Complete them in sequence 🔐 to progress.

🕳️ Vulnerabilities
- 💉 SQL Injection — Enumerate information_schema to find and crack credentials.
- 🗝️ IDOR — Access another student’s diary 📓 for Flag 1 🚩.
- 📤 Insecure File Upload — Upload a PHP reverse shell to gain system access.
- 🧩 Privilege Escalation (SUID) — Elevate to root and grab /root/Desktop/flag.txt 🏆.

⚙️ Technology Stack
- Language: 🐘 PHP
- Database: 🗄️ MySQL
- Web Server: 🌐 Apache
- Containerization: 📦 Docker & Docker Compose

# Wednesday CTF Challenge

## Storyline

Set inside Nevermore Academy, you are an undercover student trying to uncover two hidden flags by exploiting vulnerabilities in sequence.

## Vulnerability Chain

1. SQL Injection in `products.php` via `category` GET parameter (UNION-based injection).
2. Use dumped credentials to login via `login.php`.
3. IDOR in `view_diary.php?id=1` to access other students' diary entries and get Flag 1.
4. Insecure file upload in `upload_project.php` to upload a PHP reverse shell.
5. Privilege escalation via SUID binary `/usr/local/bin/vuln` to get root shell.
6. Final flag located at `/root/Desktop/flag.txt`.

## Setup Instructions

1. Ensure Docker and Docker Compose are installed.
2. Build and start containers:
   ```bash
   docker-compose up --build
   ```
3. Initialize the database:
   ```bash
   docker-compose up --build
   docker exec -i nevermore-db mysql -u root -prootpass wednesday_ctf < db/init/init_db.sql

   docker exec -i <db_container_id> mysql -u root -prootpass wednesday_ctf < /var/www/html/init_db.sql
   ```
4. Access the web app at `http://localhost:8080`.

## Notes

- The app is intentionally vulnerable for CTF purposes.
- Use Burp Suite or similar tools to test SQL Injection.
- Uploaded files are stored in `/uploads` and are executable.
- The SUID binary `vuln` allows privilege escalation.

## Flags

- Flag 1: `FLAG{WEDNESDAY_DIARY_SECRET}`
- Final Flag: Stored in `/root/Desktop/flag.txt` inside the container.
