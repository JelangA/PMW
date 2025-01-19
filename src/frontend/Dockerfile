FROM nginx:alpine

# Salin file yang sudah dibangun ke dalam folder yang tepat
COPY build/web /usr/share/nginx/html

# Set izin untuk folder yang sudah disalin
RUN chmod -R 775 /usr/share/nginx/html

