# -*- coding: utf-8 -*-
from pyvirtualdisplay import Display 			#using virtual display in non-display os
from selenium import webdriver				#using custom web browser
from selenium.webdriver.common.keys import Keys		#using keyboard key in short term
import time						#using for wait process
#import getpass						#using for get password via hiden screen
import sys, getopt					#using for get os arguments

def main(argv):
	email = ''
	password = ''
	message = ''

	try:
		opts, args = getopt.getopt(argv,"he:p:m:",["email=","password=","message"])
	except getopt.GetoptError:
		print '-e  <email> -p <password> -m <message>'
		sys.exit(2)
	for opt, arg in opts:
		if opt == '-h':
         		print '-e  <email> -p <password> -m <message>'
         		sys.exit()
      		elif opt in ("-e", "--email"):
         		email = arg
      		elif opt in ("-p", "--password"):
         		password = arg
		elif opt in ("-m", "--message"):
			message = arg
	
	display = Display(visible=0, size=(800, 600))
	display.start()
	driver = webdriver.Chrome()
	driver.quit()

	#Test Connection
	print "Connecting...."
	driver = webdriver.Chrome()
	driver.get("https://www.facebook.com/")
	title = driver.title.encode('utf-8')
	print "Connected" if title and not title.isspace() else "Connection Failure"

	#login
	#email = raw_input("Email: ")
	#password = getpass.getpass()
	elem = driver.find_element_by_id("email")
	elem.send_keys(email)
	elem = driver.find_element_by_id("pass")
	elem.send_keys(password)
	elem.send_keys(Keys.RETURN)
	title = driver.title.encode('utf-8')
	print "Login Success" if title and not title.isspace() else  "Login Failure"

	#post message
	#message = raw_input("Post Message: ")
	elem = driver.find_element_by_name("xhpc_message")
	elem.send_keys(message+'\r\npost by Thlinks Automate Server')
	for elems in driver.find_elements_by_tag_name("button"):
	       	#print elems.get_attribute('outerHTML').encode('utf-8')
	        if ">Post<" in elems.get_attribute('outerHTML').encode('utf-8'):
		        #print elems.get_attribute('outerHTML').encode('utf-8')
		        elems.send_keys(Keys.RETURN)
	        if ">โพสต์<" in elems.get_attribute('outerHTML').encode('utf-8'):
	                #print elems.get_attribute('outerHTML').encode('utf-8')
	                elems.send_keys(Keys.RETURN)
	title = driver.title.encode('utf-8')
	print "Posted" if title and not title.isspace() else  "Post Failure"

	##export page result
	#f = open('respon.html', 'w')
	#f.write(driver.page_source.encode('utf-8'))
	#f.close()

	time.sleep(5)	#wait post process
	driver.quit()

if __name__ == "__main__":
	main(sys.argv[1:])
