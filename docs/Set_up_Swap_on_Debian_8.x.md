# Set up Swap on Debian 8.x

# Overview

Swap space allows your system to utilize the hard drive to supplement capacity when RAM runs short. Composer install will fail if there is insufficient RAM available, but adding swap will allow it to complete installation.

# Solution

Via the command line, you can set up and enable swap on your Debian machine via the following commands (as root):

**Set up Swap**

```
fallocate -l 4G /swapfile
chmod 600 /swapfile
mkswap /swapfile
swapon /swapfile
echo "/swapfile   none    swap    sw    0   0" >> /etc/fstab
sysctl vm.swappiness=10
echo "vm.swappiness=10" >> /etc/sysctl.conf
sysctl vm.vfs_cache_pressure=50
echo "vm.vfs_cache_pressure=50" >> /etc/sysctl.conf
```

# Testing the Result

You should see the changes effected immediately, and can check via the command line:

**Test the Result**

```
# You should see swap in use now:
free -m

# Swappiness should now be 10
cat /proc/sys/vm/swappiness

# Cache pressure should be set to 50
cat /proc/sys/vm/vfs_cache_pressure
```

#### In this topic:

-   [Overview](#SetupSwaponDebian8.x-Overview)
-   [Solution](#SetupSwaponDebian8.x-Solution)
-   [Testing the Result](#SetupSwaponDebian8.x-TestingtheResult)

#### Related topics:

[Installation Guide for Unix-Based Systems](Installation_Guide_for_Unix-Based_Systems)


