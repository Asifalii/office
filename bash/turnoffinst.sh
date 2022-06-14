instname=$(eval "wget -q -O - http://169.254.169.254/latest/meta-data/instance-id")
#echo "$instname"
command_string="aws ec2 stop-instances --instance-ids $instname"
echo $(eval "$command_string")
