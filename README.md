# Environment variables
You must populate the following environment variables:
- TWILIO_ACCOUNT_SID
- TWILIO_AUTH_TOKEN

# Usage
- `./send.php [FLOW_SID] [FROM_PHONE_NUMBER] [ROUTE] [PATH_TO_CSV]`
- Example: `./send.php FW3da95f1c6483017b5b23c536faada8f0 +17755228136 initial_schedule_path ./example.csv`
 
# Notes
- Additional columns in the csv file are sent to the rest API. They are named as integers. In example.csv, the name would be available as `flow.data.1`
