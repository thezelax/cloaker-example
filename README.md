

---

# PHP Cloaking Script

This repository contains a simple and effective PHP cloaking script designed to filter traffic and serve different content based on user IP addresses, user agents, and referers. This script is ideal for webmasters and marketers looking to protect their offer pages from unwanted traffic, such as bots and crawlers, while ensuring legitimate users have a seamless experience.

## Features

- **IP Filtering**: Blocks traffic from specific IP addresses and IP ranges.
- **User Agent Filtering**: Detects and blocks known bots and crawlers based on user agent strings.
- **Referer Filtering**: Blocks traffic coming from specific referer URLs.
- **Dynamic Content Serving**: Serves a PHP offer page to legitimate users and an HTML white page to blocked users.

## How It Works

The script examines the incoming traffic and applies multiple checks:
1. **IP Address Check**: Uses a predefined list of IP addresses and ranges to block known bots and unwanted traffic.
2. **User Agent Check**: Matches the user agent string against a list of known bots and crawlers.
3. **Referer Check**: Blocks traffic based on referer URLs to prevent spam and unwanted sources.

Based on these checks, the script decides whether to serve the offer page (for legitimate users) or the white page (for blocked users).

## Usage

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/yourusername/php-cloaking-script.git
   ```

2. **Update the Script**:
   - Modify `offer_page.php` to include your PHP offer page logic.
   - Modify `white_page.html` to include your HTML white page content.
   - Update the lists of blocked IPs, user agents, and referers as needed.

3. **Deploy**:
   - Upload the files to your web server.
   - Ensure the script is correctly referenced in your site configuration.

## Example

Here is a simplified example of how the script works:

```php
$offer_page_path = 'offer_page.php';
$white_page_path = 'white_page.html';

$filter_page = determine_filter_page($_SERVER);

if ($filter_page == 'offer') {
    require_once($offer_page_path);
} else {
    echo file_get_contents($white_page_path);
}
```

For a detailed implementation, please refer to the script in this repository.

## License

This project is licensed under the Suck My Dick License

# Suck My Dick License
## Version 2.0

Permission is hereby granted, free of charge, to any motherfucker, shithead, or asshole obtaining a goddamn copy of this utterly useless software and associated shitty documentation files (the "Software"), to deal in the fucking Software without any goddamn restrictions, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following asshole conditions:

1. You are allowed to fucking modify the Software as long as you include a prominent note stating that the original cocksucking author can't be bothered by your pathetic modifications and you should continue sucking their tiny fucking dick. You're free to make it shittier, more fucked up, or utterly useless—it's all up to your dumbass creativity.

2. When sharing the Software, you must accompany it with a vivid illustration of a vacuum cleaner, symbolizing the act of sucking, to ensure maximum visual representation of your compliance, you fucking moron. It must be a high-resolution image, capturing every dirty detail of the vacuum cleaner's hose, reminding everyone that they're obliged to suck it with unparalleled enthusiasm.

3. Commercial use of the Software is permitted, but you must ensure that your shitty product or service prominently features a "Suck My Dick" logo, slogan, or equivalent, as a sign of your unwavering commitment to being a complete douchebag. Make sure the logo is big, bold, and in-your-face, leaving no room for doubt that you're part of the illustrious league of dick-sucking software enthusiasts.

4. You may use markdown or any other fucking formatting language to express your profound dedication to the spirit of this license. In fact, the use of excessive bold, italics, and colorful language is highly encouraged to display your total lack of class and decency. Feel free to go nuts, experiment with fonts, or invent new profanities—it's your opportunity to shine as a certified genius of obscenities.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT ANY MOTHERFUCKING WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. GO FUCK YOURSELF, AND MAY YOUR DICK-SUCKING ENDEAVORS BE EVERLASTING.
