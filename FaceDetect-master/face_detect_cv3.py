import cv2
import sys
import os
from PIL import Image




# Get user supplied values
imagePath = sys.argv[1]
cascPath = "haarcascade_frontalface.xml"

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
    minSize=(30, 30)
    #flags = cv2.CV_HAAR_SCALE_IMAGE
)
#print (faces)
#print("Found {0} faces!".format(len(faces)))

# Draw a rectangle around the faces
for (x, y, w, h) in faces:
   cv2.rectangle(image, (x, y), (x+w, y+h), (0, 255, 0), 2)

#cv2.imshow("Faces found", image)
cv2.imwrite('uploads_images/result.jpg', image)

print("done", img)
#cv2.waitKey(0)
