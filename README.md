## Clio Node Viewer and API

# Installation Instructions
1. Deploy as you normally would any Laravel application (ensure creation of database as defined in the env.example)

# API Endpoints
1. /api/nodes/new
-  Allows adding a new node simply by posting data to the endpoint
```
{
	"parent_id": {int},
	"name": {string},
	"details": {string/null}
}
```
2. /api/nodes/{id}/change-parent
-  Allows changing the parent of a node by accepting data being posted
```
{
	"new_parent_id": {int}
}
```
3. /api/nodes/{id}/children
-  This endpoint returns the direct children of the node being queried.
