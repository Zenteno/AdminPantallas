from SimpleWebSocketServer import SimpleWebSocketServer, WebSocket
import json

usuarios = []
servidores = {}
pantallas = {}

class SimpleEcho(WebSocket):

    def handleMessage(self):
		datos =  json.loads(self.data)
		if datos["comando"]==0:
			if datos["pantalla"]==0:
				servidores[datos["id"]]=self
			else:
				pantallas[datos["id"]]= self
		else:
			print datos["to"]
			servidores[
				datos["to"]
			].sendMessage(self.data)
			
    def handleConnected(self):
    	print(self.address, 'connected')
    	#usuarios.append(self)

    def handleClose(self):
		for llave in servidores:
			if servidores[llave]==self:
				del servidores[llave]
				print('se fue un administrador')
				return
		for llave in pantallas:
			if pantallas[llave]==self:
				del pantallas[llave]
				print('se fue una pantalla')
				return
		
		

server = SimpleWebSocketServer('0.0.0.0', 8080, SimpleEcho)
server.serveforever()
