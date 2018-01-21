import websocket
import json
import wget
import thread
import os

def on_message(ws, message):
	def run(*args):
		carpeta = "./"
		try:
			dato = json.loads(message)
			if dato["comando"] == 1:
				url = "http://201.217.242.94:8000/api/descargar/"+dato["archivo"]
				filename = wget.download(url, out=carpeta)
			if dato["comando"] == 4:
				os.remove(carpeta+dato["archivo"])
		except Exception as e:
			raise e
	thread.start_new_thread(run, ())


def on_error(ws, error):
	print (error)

def on_close(ws):
	print ("### closed ###")

def on_open(ws):
	print("hola")


if __name__ == "__main__":
	websocket.enableTrace(True)
	ws = websocket.WebSocketApp("ws://201.217.242.94:8080",
							  on_message = on_message,
							  on_error = on_error,
							  on_close = on_close)
	ws.on_open = on_open
	ws.run_forever()
