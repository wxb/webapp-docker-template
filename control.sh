#!/bin/bash
# author wangxb
# time 2016-05-20
#
PROJECT_NAME="web"
IMAGE_NAME="wangxb/image-$PROJECT_NAME"
CONTAINER_NAME="container-$PROJECT_NAME"

function operate(){
    case $1 in
        "install" )
            sudo apt-get update && apt-get upgrade -y && apt-get install curl
            curl -fsSL https://get.docker.com/ | sh
            ;;
        "build" )
            docker build -t  $(echo $IMAGE_NAME) .
            ;;
        "start" )
            docker run -d --name $(echo $CONTAINER_NAME) -p 80:80 -v $(pwd):/usr/share/nginx/html wangxb/nginxphpfpm
            ;;
        "restart" )
            docker restart $(echo $CONTAINER_NAME)
            ;;
        "stop" )
            docker stop $(echo $CONTAINER_NAME)
            ;;
        * )
            echo "Command execution error"
            exit 1
            ;;
    esac
}

if [[ "$#" -eq 1 ]]; then
    #statements
    operate $1
else
    echo "Command Format："
    echo "    bash control.sh [start|stop|restart|install|build] "
    echo "e.g:"
    echo "    bash control.sh start"
    echo "Please try again"
fi
