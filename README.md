# Environment variables
You must populate the following environment variables:
- TWILIO_ACCOUNT_SID
- TWILIO_AUTH_TOKEN

# Usage
- `./send.php [FLOW_SID] [TO_PHONE_NUMBER] [FROM_PHONE_NUMBER] [PARAMS]`
- Example: `./send.php FW3da95f1c6483017b5b23c536faada8f0 +16179708237 +17755228136 route=initial_schedule_path`
- Params are name/value pairs formatted like a querystring.
