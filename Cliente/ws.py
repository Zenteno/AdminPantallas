import websocket
import json
import wget
import thread
import os
import subprocess

def on_message(ws, message):
	def run(*args):
		carpeta = "./"
		try:
			dato = json.loads(message)
			if dato["comando"] == 1:
				#url = "http://pantalla.test/api/descargar/"+dato["archivo"]
				url = "http://201.217.242.94:8000/api/descargar/"+dato["archivo"]
				subprocess.Popen(["wget","--content-disposition",url,"-P",carpeta])
				#filename = wget.download(url, out=carpeta)
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
	print("Conectado")


if __name__ == "__main__":
	# enableTrace habilita modo depuración
	websocket.enableTrace(False)
	ws = websocket.WebSocketApp("ws://201.217.242.94:8080",
	#ws = websocket.WebSocketApp("ws://192.168.10.10:8080",
							  on_message = on_message,
							  on_error = on_error,
							  on_close = on_close)
	ws.on_open = on_open
	while True:
		ws.run_forever()