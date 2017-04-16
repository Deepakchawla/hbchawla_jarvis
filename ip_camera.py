import urllib as ul
import cv2
import numpy as np

url = 'http://192.168.1.101:8080/shot.jpg'
imgResp=ul.urlopen(url)
imgNp=np.array(bytearray(imgResp.read()),dtype=np.uint8)
img=cv2.imdecode(imgNp,-1)
cv2.imshow('ip_camera_img',img)
cv2.imwrite('try.jpg',img)
cv2.waitKey(1) & 0xFF == ord('q')
