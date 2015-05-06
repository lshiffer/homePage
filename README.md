![alt tag](https://magnum.travis-ci.com/kkthxby3/homePage.svg?token=YnLXV4zJfeEsWV3wzyEe&branch=server)

<h1>Just Us (Title Pending)</h1>
A single-page platform to view current news and happenings while chatting with others.

1)  Create an account!

2)  In Settings, upload a picture.

3)  Browse reddits of subreddits.

4)  Chat with others currently connected.

Primary focus was the backend and communicating between the front and back.

Most time was spent creating a live stream from the server to the client(s) through Laravel.

Laravel communicates to a Node server through a Subscribe/Publish Redis relationship.

<h2>To Run</h2>
Install Redis and run the Redis server.

Run the node server in node folder.

If local, run 'php artisan serve'. MUST HAVE php >= 5.5

<h2>Current Issues</h2>

Scrollbars not properly resetting.

New user's default picture not loaded upon /first/ login.

<h3>Considerations</h3>
I've had experience in front-end development so I chose to focus more on the backend and communicating between the client and server.

I felt Laravel provided a lot of features out of the box so I was intent on building around that framework.  The development environment was first setup on a CentOS server installing Laravel, Node, and Reddis to create a simple real-time communication app.  Once working, that environment was recreated locally to build the actual app.  Basically, Laravel acts as if a fort around the node server. 

Many of Laravel's built-in features were used.  I was going to rebuild all of the html for the app but after seeing how Laravel's pre-built html is dynamic to resize for screens, I worked with it.  To get the correct desktop display, only the header is currently dynamic but I do have plans to extend that dynamism back to the new content divs to ensure the site can be easily used through a mobile device.  

Handlebars were used on the front for new chat messages to be easily compiled into html and inserted.

User profiles are actually views of their own that are sent from the server to be inserted into the page. 

<h2>Resources</h2>
Live

http://lukeshiffer.com/git/homePage/public/home

Video Walktrough

https://www.screenr.com/SmQN

