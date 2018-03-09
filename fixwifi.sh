#!/bin/bash
sudo systemctl stop NetworkManager.service
sudo systemctl start NetworkManager.service &
disown
clear
