#!/usr/bin/node
var http = require("http"),
    url = require("url"),
    path = require("path"),
    fs = require("fs")
    port = process.argv[2] || 8080;

var contentTypeFromExtension = function(file){
	if (/\.js$/.test(file)){
		return "text/javascript";
	} else if (/\.html$/.test(file)){
		return "text/html";
	} else if (/\.css$/.test(file)){
		return "text/css";
	} else {
		return "text/plain";
	}
};
 
var wget = function(host, path, onSuccess, onError) {
	var options = {
	    host: host,
	    path: path
	};
	var request = http.request(options, function (res) {
	    var data = '';
	    res.on('data', function (chunk) {
		data += chunk;
	    });
	    res.on('end', function () {
		onSuccess(data);
	    });
	});
	request.on('error', function (e) {
	    console.log('http request error: '+e.message);
	    onError(e);
	});
	request.end();
};

http.createServer(function(request, response) {
 
  var uri = url.parse(request.url).pathname
    , filename = path.join(process.cwd(), uri);
  
  path.exists(filename, function(exists) {
    if(!exists) {
      response.writeHead(404, {"Content-Type": "text/plain"});
      response.write("404 Not Found\n");
      response.end();
      return;
    }
 
    if (fs.statSync(filename).isDirectory()) filename += '/index.html';
 
    fs.readFile(filename, "binary", function(err, file) {
      if(err) {        
        response.writeHead(500, {"Content-Type": "text/plain"});
        response.write(err + "\n");
        response.end();
        return;
      }
 
      response.writeHead(200, {"Content-Type": contentTypeFromExtension(filename)});
      response.write(file, "binary");
      response.end();
    });
  });
}).listen(parseInt(port, 10));
 
console.log("Static file server running at\n  => http://localhost:" + port + "/\nCTRL + C to shutdown");
