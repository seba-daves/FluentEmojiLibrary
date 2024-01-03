# The Fluent Emoji Library
![alt text](img/logo-emoji-library.png "")
A web tool to browse Microsoft's Fluent Emojis

## Installing:
* Clone this repo with `git clone https://github.com/seba-daves/FluentEmojiLibrary.git`
* Clone Microsoft's Fluent Emoji Repo with: `git clone https://github.com/microsoft/fluentui-emoji.git`
* Move the `/assets` folder from Microsoft's repo, to the install folder of The Fluent Emoji Library
* Your install folder should now look like this:
  
  `/assets`
  
  `/css`
  
  `/img`
  
  `api.php`
  
  `compiler.py`
  
  `favicon.ico`
  
  `index.html`

* Move `compiler.py` to the `/assets` folder
* Run `compiler.py` with `python compiler.py`
* compiler.py will create a `emojis.csv` file inside the `/assets` folder, move it to the install folder.
* Your install folder should now look like this:
  
  `/assets`
  
  `/css`
  
  `/img`
  
  `api.php`
  
  `emojis.csv`
  
  `favicon.ico`
  
  `index.html`
  
* You're all set, The Fluent Emoji Library now works!

## API
The Fluent Emoji Library comes with an handy API, here's what you can do with it:
* `/api.php?action=all` returns all the records in the emojis.csv file
* `/api.php?emoji=😆&style=3d` returns the 😆 emoji in the fluent (3d) style, you can also get different styles (3d, color, flat, hc[high contrast])

## Used Technologies
PHP, Javascript, Python, CSS, JQuery

## Credits
[Microsoft's Fluent Emojis](https://github.com/microsoft/fluentui-emoji.git) , Microsoft Segoe UI Variable Font, [Microsoft Fluent UI Web Components](https://learn.microsoft.com/en-us/fluent-ui/web-components/)
