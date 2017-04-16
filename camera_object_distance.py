import numpy as np
import cv2
import time
print ("done");
#import the cascade for face detection
face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')

def find_marker(image):
	# convert the image to grayscale, blur it, and detect edges
	gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
	gray = cv2.GaussianBlur(gray, (5, 5), 0)
	edged = cv2.Canny(gray, 35, 125)

	# find the contours in the edged image and keep the largest one;
	# we'll assume that this is our piece of paper in the image
	(cnts, _) = cv2.findContours(edged.copy(), cv2.RETR_LIST, cv2.CHAIN_APPROX_SIMPLE)
	c = max(cnts, key = cv2.contourArea)

	# compute the bounding box of the of the paper region and return it
	return cv2.minAreaRect(c)

def distance_to_camera(knownWidth, focalLength, perWidth):
	# compute and return the distance from the maker to the camera
	return (knownWidth * focalLength) / perWidth

def TakeSnapshotAndSave():
    # access the webcam (every webcam has a number, the default is 0)
    cap = cv2.VideoCapture(0)

    while(True):
        # Capture frame-by-frame
        ret, frame = cap.read()

        # to detect faces in video
        gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
        faces = face_cascade.detectMultiScale(gray, 1.3, 5)

        for (x,y,w,h) in faces:
            cv2.rectangle(frame,(x,y),(x+w,y+h),(255,0,0),2)
            roi_gray = gray[y:y+h, x:x+w]
            roi_color = frame[y:y+h, x:x+w]



        x = 0
        y = 20
        text_color = (0,255,0)
        # write on the live stream video
        cv2.putText(frame, "Press q when ready", (x,y), cv2.FONT_HERSHEY_PLAIN, 1.0, text_color, thickness=2)


        # if you want to convert it to gray uncomment and display gray not fame
        #gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

        # Display the resulting frame
        cv2.imshow('frame',frame)
	a = len(faces)
	print (faces)
	if a == 0:
		print "it is empty"
	else:
		print "it is not empty"

        # press the letter "q" to save the picture
	#if result == range(2,3):
	 #   cv2.imwrite('try.jpg',frame)
	#else:
	#   print "done"
       # if cv2.waitKey(1) & 0xFF == ord('q'):
	#    cv2.imwrite('try.jpg',frame)
            # write the captured image with this name
            

    # When everything done, release the capture
    cap.release()
    cv2.destroyAllWindows()
TakeSnapshotAndSave()
