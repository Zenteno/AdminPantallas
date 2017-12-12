from SimpleWebSocketServer import SimpleWebSocketServer, WebSocket

usuarios = []

class SimpleEcho(WebSocket):

    def handleMessage(self):
    	print self.data
    	for u in usuarios:
			if u!=self:
				u.sendMessage(self.data)

    def handleConnected(self):
    	print(self.address, 'connected')
    	usuarios.append(self)

    def handleClose(self):
    	usuarios.remove(self)
        print(self.address, 'closed')

server = SimpleWebSocketServer('127.0.0.1', 8080, SimpleEcho)
server.serveforever()
