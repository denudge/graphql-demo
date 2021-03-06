# GraphQL-Demo

This is a minimal demo to show how you can query users and comments with GraphQL
with PHP and Laravel.

## How to use this

Simplest way:
- Go to ./public
- Start php -S localhost:8000
- Open your Browser
- Make a sample query like http://localhost:8000/graphql?query={users{name,email,comments{text,likes_count}}}
- Make a sample mutation like http://localhost:8000/graphql?query=mutation+AddComment{AddComment(email:%22john@doe.com%22,text:%22A new comment%22){id,likes_count,timestamp,parent_status,text,user{name,email,id}}}
- Play around
- Explore the code

## Available types and fields

There are two types:
- users
- comments

You can query comments and use the user to get the author, but also the users and comments within them.

Users have id, name and email as well as comments for the comment type.
Comments have id, text, timestamp, parent_status, likes_count and user_id as well as user for the user type.

## Code

You can find all the relevant code inside app/GraphQL.

## Hint

If you like, make the user's email required in app/GraphQL/Type/UserType.php in line 32
from 'type' => Type::string() to 'type' => Type::nonNull(Type::string()).
You still can query for Terrence Hill, but if you ask for an email, this user will not be listed anymore.

Thanks for coming by.
Have fun.

