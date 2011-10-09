#!/bin/bash
rm $1.photo.yaml
rm -rf "media/photo/$1/"
rm -rf "media/thumb/$1/"
mkdir "media/photo/$1"
mkdir "media/thumb/$1"
cd ../$1/
for f in *
do
echo "Processing $f: original"
convert -resize x600 "$f" "../www/media/photo/$1/$f"
echo "Thumbnail"
convert -size x120 -resize x120 "$f" "../www/media/thumb/$1/$f"
echo "Writing to YAML-file"
echo "$1/$f" >> ../www/$1.photo.yaml
echo "Done"
done