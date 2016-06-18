SELECT
  users.name,
  subscriptions.event_type
FROM users
  JOIN user_sub ON (users.id = user_sub.user_id)
  JOIN subscriptions ON (subscriptions.id = user_sub.sub_id);