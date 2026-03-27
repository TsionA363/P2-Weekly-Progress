# PHP Security & Form Handling

## HTTP Methods

### GET Method
- GET method sends form data via URL and is visible in the browser.
- It's suitable for small amounts of non-sensitive data.

### POST Method
- POST method sends form data in the request body and is not visible in the URL.
- It's better for sensitive data like passwords.

## Security Threats & Prevention

### XSS (Cross-Site Scripting)
- XSS happens when user input is displayed without sanitization, allowing attackers to inject malicious scripts.
- **Prevention:** Use `htmlspecialchars()` or `htmlentities()` to prevent XSS by converting HTML special characters to safe text.

### SQL Injection
- SQL Injection occurs when attackers insert malicious SQL code via user input.
- **Unsafe Example:** Writing queries like `"SELECT * FROM users WHERE username='$input'"` is unsafe.
- **Prevention:** Use prepared statements with bound parameters to safely include user input in SQL queries.

### CSRF (Cross-Site Request Forgery)
- CSRF tricks a user into performing actions without their consent (like submitting forms on other websites).
- **Prevention:** Generate a unique token for each form and validate it on submission.

## Best Practices
- Always validate, sanitize, and escape user inputs to protect your application from these common security threats.
