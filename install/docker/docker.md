子命令	说明

``

    docker network connect	将容器连接到网络。
    
    docker network create	创建新的 Docker 网络。默认情况下，在 Windows 上会采用 NAT 驱动，在 Linux 上会采用
    Bridge 驱动。可以使用 -d 参数指定驱动（网络类型）。
    
    docker network disconnect	断开容器的网络。
    
    docker network inspect	提供 Docker 网络的详细配置信息。
    
    docker network ls	用于列出运行在本地 Docker 主机上的全部网络。
    
    docker network prune	删除 Docker 主机上全部未使用的网络。
    
    docker network rm	删除 Docker 主机上指定网络。
``