from flask import Flask
app = Flask(__name__)

import urllib.request

@app.route("/pgn/<category>")
def pgn(category):
    with urllib.request.urlopen('http://www.bjk2016.be/games/{}/games.pgn'.format(category)) as resp:
        return resp.read()

@app.route("/")
def hello():
    return open("pgn.html").read()

if __name__ == "__main__":
    app.run()

