# To start a simple webserver in the current dir
`python -m SimpleHTTPServer 8080`

# Install
## Download this git and cd into it
`git clone https://github.com/Subely/sub-dashboad.git && cd sub-dashboad`

## Then to serve the website start up a php server
`php -S localhost:8080 -t ./ && open http://localhost:8080/`



# Current @TODO
- [x] Dashboard secured login and logout
- [x] Nav with dropdown logout btn
- [ ] Support / ticket page.
- [ ] Add Settings page.
- [ ] Integrate live support chat when available

## longterm @TODO
- [ ] Make a global footer
- [ ] Change core.js to vue.js (react alternative)
- [ ] Encrypt the posted password
- [ ] change to foundation
