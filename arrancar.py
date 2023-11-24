from selenium import webdriver
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import xlsxwriter
import time

driver1 = webdriver.Firefox()
driver1.set_window_position(0, 0, windowHandle='current')
driver1.maximize_window()
driver1.get("http://localhost/ProyectoPantallas/index.php?perfil=Alumno")
driver1.fullscreen_window()
time.sleep(3)

driver2 = webdriver.Firefox()
driver2.set_window_position(1921, 0, windowHandle='current')
driver2.maximize_window()
driver2.get("http://localhost/ProyectoPantallas/index.php?perfil=Profesor")
driver2.fullscreen_window()
time.sleep(120)
