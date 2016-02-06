# Simple PHP Catcha

## Usage
**In the html:**
Simply include the captcha directory (or index.php page) in an image tag and create a text/number input box. 

```html
	<img src="/captcha/" class="noframe" alt="" id="captchaImage" />
	<input type="text" placeholder="Answer" name="captcha" size="2" id="captchaInput"/>
```

**In the server script (PHP):**
Check the incoming request value (in this examples case 'captcha') against the stored sessions value. Remember to include `session_start()` at the top of the php file.
```php
	if($_REQUEST['captcha'] != $_SESSION['captcha'])
		// send error
	else
		// process request
```
