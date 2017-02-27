# GraphQL-Demo

This is a minimal demo to show how you can query users and comments with GraphQL
with PHP and Laravel.

## How to use this

Simplest way:
- Go to ./public
- Start php -S localhost:8000
- Open your Browser
- Navigate to http://localhost:8000/graphql?query={users{name,email,comments{text,likes_count}}}
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

Thanks for coming by.
Have fun.

