# idk what I'm doing

## The idea

I'm trying to redo the website in much simpler fashion that allows for ease of writing content as well as ease of publishing.

Based off [Opal's idea of generating a static site with make](https://wowana.me/blog/wowaname-now-on-git-and-hosted-on-my-laptop.xht), the basic idea here is to:

* write site content and pages in markdown

* have the server use something like `hoedown` to convert the markdown files into HTML

* merge the converted files with pre-designated header and footer files to create usable and viewable webpages 

* ??????

* hope it works

Ideally this would all be automated; ie. I write the files on my shitty laptop, I user `git push` to send them to my Gitea server, which triggers a git hook that will run a script and download the code to a temp folder on my server, run the stuff, use `rsync` to update the files in my webserver with the output, and hope I have a working website after.

In addition, I would also like to better integrate my site's blog (for better or for worse) into the main portion.

## To-do

* Create header file
* Create footer file
* Create any necesarry files for pages
* Create script to generate pages 

I must disclose that I am not a programmer so I have 0 idea what I am doing at any point.

## The benefit

Currently my site uses some shitty PHP scripts that I hacked together with my limited knowledge, that essentially just use server-side includes on content to make keeping a consistent layout easier.

The downside to this is that:

* Content still needs to be written in HTML, which isn't too hard but more annoying than anything
* It uses more server resources than necessary (that being said it's probably not a lot, but I run other services like Pleroma and Gitea on here so ideally I'd like to keep this site's footprint light)
* I do not know PHP lol

So, I'm hoping that if I can get this approach working, then I will have a much more simplified website that's easier to update. 