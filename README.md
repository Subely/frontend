# This is the dropbox hosting solution
## http://subely.com/

# Install
## Download this git and cd into it
`git clone https://github.com/Subely/subely.com.git && cd subely.com`

## Then to serve the website start up a php server
`php -S localhost:8080 -t ./`

## @TODO for Production
 - change the api clientID and secret
 - change cookies and everything to https


## Current @TODO
- [x] Dashboard secured login and logout
- [x] Nav with dropdown logout btn
- [ ] Fix time created in api and frontend
- [ ] Browserify and live-reload
- [ ] Move css to SASS
- [ ] Support / ticket page.
- [ ] Add Settings page.
- [ ] Integrate live support chat when available

## Longterm @TODO
- [ ] Make a global footer
- [ ] Change core.js to vue.js (react alternative)
- [ ] Encrypt the posted password
- [ ] Change css framework to foundation
