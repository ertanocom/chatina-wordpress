=== Chatina Ai – Live Chat Online Platform ===
Contributors: ertano, mihanwp
Tags: live chat, chat, AI chat, customer support
Requires at least: 5.0
Tested up to: 6.7
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Website: https://chatina.ai

== Description ==

Chatina AI brings advanced live chat functionality to your WordPress website, enhancing user engagement and support efficiency with an AI-powered chat solution. (Coming Soon...)

== Key Features ==

* Real-Time Chat: Connect instantly with website visitors to provide seamless support and boost engagement.
* AI-Powered Responses: Leverage AI-driven responses to answer common queries and reduce response time. (Coming Soon...)
* Customizable Chat Widget: Easily customize the chat widget to match your site’s design and brand identity.
* User-Friendly Dashboard: Manage conversations, view analytics, and optimize your chat interactions through an intuitive dashboard.
* Integration with Chatina Platform: Fully compatible with the Chatina AI platform, integrating seamlessly with additional features on [chatina.ai](https://chatina.ai).

== Why Choose Chatina AI? ==

With Chatina AI, you can enhance customer satisfaction by providing fast, accurate, and efficient live chat support. Ideal for businesses, e-commerce sites, and service providers looking to improve customer interaction and support.

== External Services ==

This plugin connects to external APIs to provide live chat functionality and manage related services. The external services are detailed below:

### Chatina AI API
- **What it is used for:**  
  The Chatina AI API powers the live chat functionalities, including initializing chats, fetching chat information, and interacting with businesses using Chatina's platform.

- **Data sent and when:**  
  - **API Endpoints:**  
    - `https://api.chatina.ai/v1/chat`: Used to initialize and manage live chats. It sends chat-related metadata, such as chat ID and user tokens, when a chat is started.  
    - `https://api.chatina.ai/v1/business/`: Sends the user's token and business identifiers to fetch details about businesses available for chat.  
    - `https://api.chatina.ai/v1/c/`: Sends a chat token and chat metadata to validate and retrieve chat data.  
    - `https://api.chatina.ai/v1/chat/information`: Sends the chat ID and chat token to retrieve detailed chat-related information.

  - **Other Data Sent:**  
    - **User Tokens:** Used to authenticate the user with the service.  
    - **Chat Metadata:** Includes chat ID and session-related identifiers.

- **Why:**  
  The API is required to facilitate the core functionalities of the plugin, including establishing communication between users and businesses.

- **Service Provider:**  
  Chatina AI  
  - [Terms of Service](https://chatina.ai/terms)  
  - [Privacy Policy](https://chatina.ai/privacy)  

### Chatina AI CDN
- **What it is used for:**  
  The Chatina AI CDN (`https://cdn.chatina.ai/static/`) is used to serve assets and resources required for the plugin's operation, such as JavaScript files and static content.

- **Data sent and when:**  
  No personal or user data is sent to the CDN. It is accessed to fetch static resources required for plugin functionality.

== Installation ==

1. Upload the plugin files to the /wp-content/plugins/chatina-ai directory, or install the plugin directly through the WordPress plugin screen.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Configure your Chatina AI settings in the dashboard to start chatting live with visitors.

== Loading CSS and JavaScript Remotely ==

To ensure proper functioning of your Chatina chat widget, it is essential to load the required CSS and JavaScript files directly from Chatina’s CDN. Below are the URLs for the necessary assets:

Required Assets

JavaScript

URL: https://cdn.chatina.ai/static/widget.js

CSS

URL: https://cdn.chatina.ai/static/widget.css

By including these resources, your chat widget will have the most up-to-date code and styling, ensuring compatibility and optimal performance. Simply add the following <link> and <script> tags to your HTML:

<link rel="stylesheet" href="https://cdn.chatina.ai/static/widget.css">

<script src="https://cdn.chatina.ai/static/widget.js"></script>

Embedding these assets will integrate the necessary functionality and styles seamlessly into your webpage.

== Source Code ==

To comply with WordPress.org guidelines, all source code related to this plugin is available in both the plugin directory and a public repository.

Unminified JavaScript and CSS files can be found in the following locations:
- Plugin Directory: /assets/js/widget-normal.js and /assets/css/widget-normal.css
- GitHub Repository: [Chatina AI GitHub](https://github.com/chatinaai/chatina-wordpress/)

For instructions on rebuilding the compressed files, please refer to the `BUILD.md` file in the GitHub repository or see the section below.

== Build Instructions ==

This plugin uses build tools (e.g., Webpack, npm) for compression. Follow these steps to recreate the production files:
1. Clone the repository: git clone https://github.com/chatinaai/chatina-wordpress/chatina-wordpress.git
2. Navigate to the project directory: cd chatina-wordpress
3. Install dependencies: npm install
4. Build the files: npm run build

== Additional Notes ==

Chatina uses React.js, a powerful and flexible open-source JavaScript library, to build and manage the dynamic components of the plugin. React.js is licensed under the MIT License, ensuring freedom for developers to use, modify, and distribute the library as needed.

== Changelog ==

= 1.0 =
* Initial release with core live chat functionality.
