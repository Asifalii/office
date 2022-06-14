#!/bin/bash
cd /mnt/volume_sgp1_01/movdict/ss
for f in *.jpeg; do cwebp -q 90 "$f" -o "${f}".webp; done