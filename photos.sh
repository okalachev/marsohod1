#!/bin/bash
rm calendar.photo.yaml
cd ../photo_2011/
for f in I*
do
echo "Processing $f: original"
convert -resize x600 "$f" "../www/media/photo/calendar/$f"
echo "Thumbnail"
convert -resize x120 "$f" "../www/media/thumb/calendar/$f"
echo "Writing to YAML-file"
echo "calendar/$f" >> ../www/calendar.photo.yaml
echo "Done"
done

echo "1st demo"
cd ../www
rm risunki.photo.yaml
cd media/photo/risunki
for f in *.jpg
do
echo "Processing $f"
echo "risunki/$f" >> ../../../risunki.photo.yaml
convert -resize x120 "$f" "../../thumb/risunki/$f"
echo "Done"
done