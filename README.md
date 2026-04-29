# Core PHP CSRF Token Example

This project demonstrates a basic CSRF protection implementation using core PHP and session-based tokens.

## Files

- `functions.php`
  - starts PHP session
  - generates and stores a CSRF token in `$_SESSION`
  - validates submitted tokens using `hash_equals`
  - rotates the token after a successful form submission
  - renders the hidden CSRF token field for forms

- `index.php`
  - displays a simple form with `name` and `message` fields
  - includes the hidden CSRF token field

- `submit.php`
  - validates the request method is `POST`
  - checks the submitted CSRF token
  - rotates the CSRF token after successful validation
  - displays the submitted values safely

## Usage

1. Place the project folder in your web server document root.
2. Open `index.php` in your browser.
3. Fill out the form and submit.
4. If CSRF validation succeeds, the form submission is accepted and the token is rotated.

## Notes

- The CSRF token is stored in the session and submitted as a hidden form field.
- After a successful submit, a new CSRF token is generated to prevent reuse.
- This implementation is for learning and demonstration purposes.
