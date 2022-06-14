rm -rf /var/www/langtags.txt
instname=$(eval "wget -q -O - http://169.254.169.254/latest/meta-data/instance-id")
#echo "$instname"
command_string="aws ec2 describe-tags --filters Name=resource-id,Values=$instname Name=key,Values=langs"
echo $(eval "$command_string") | jq '.Tags[].Value' | tr -d '"' | awk 'BEGIN{RS=","}{$1=$1}1' >> /var/www/langtags.txt
