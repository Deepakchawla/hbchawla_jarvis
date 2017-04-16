import sys
import urllib as ul
import cv2
import numpy as np
import os

def image_detection():
    # Get user supplied values
    url = 'http://192.168.1.101:8080/shot.jpg'
    imgResp=ul.urlopen(url)
    imgNp=np.array(bytearray(imgResp.read()),dtype=np.uint8)
    img=cv2.imdecode(imgNp,-1)
    cv2.imwrite('try.jpg',img)
    imagePath = "try.jpg"
    cascPath = "haarcascade_frontalface_default.xml"

    # Create the haar cascade
    faceCascade = cv2.CascadeClassifier(cascPath)

    # Read the image
    image = cv2.imread(imagePath)
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

    # Detect faces in the image
    faces = faceCascade.detectMultiScale(
        gray,
        scaleFactor=1.1,
        minNeighbors=5,
        minSize=(30, 30),
        flags = cv2.cv.CV_HAAR_SCALE_IMAGE
    )
    for (x, y, w, h) in faces:
        cv2.rectangle(image, (x, y), (x+w, y+h), (0, 255, 0), 2)
    print("Found {0} faces!".format(len(faces)))
    print (faces)
    a = len(faces)
    if a == 0:
        print("it is empty")
    else:
        print("it is not empty")
        cv2.imwrite('image_detect.jpg',image)
        os.system("php -r 'include \"test.php\";foo(\"image_detect.jpg\");'")


    # Draw a rectangle around the faces
a=1
while (a==1):
    image_detection()

#php -r 'include "test.php"; ClassName::foo();'
