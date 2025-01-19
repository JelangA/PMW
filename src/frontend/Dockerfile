FROM nginx:alpine

COPY ./src/frontend /usr/share/nginx/html

RUN chmod -R 775 /usr/share/nginx/html/build/web

COPY ./nginx/flutter_frontend.conf /etc/nginx/conf.d/

EXPOSE 8000

CMD ["nginx", "-g", "daemon off;"]
