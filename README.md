# Brhom Project - Vercel Deployment Guide

## Prerequisites
- Vercel account
- MySQL database (can use PlanetScale, Amazon RDS, or similar)

## Local Development Setup
1. Copy the `.env` file and configure your database credentials
2. Run a local PHP server to test the application

## Deployment on Vercel

### Step 1: Setup Environment Variables
In your Vercel project dashboard, add the following environment variables:
- `DB_HOST`: Your MySQL host
- `DB_USER`: Your MySQL username
- `DB_PASSWORD`: Your MySQL password
- `DB_NAME`: Your MySQL database name

### Step 2: Deploy to Vercel
1. Install Vercel CLI:
```
npm i -g vercel
```

2. Login to Vercel:
```
vercel login
```

3. Deploy the project:
```
vercel
```

4. For production deployment:
```
vercel --prod
```

### Important Notes
- Make sure your MySQL database is accessible from Vercel's serverless functions
- If using PlanetScale, update the connection parameters accordingly
- The project has been restructured to work with Vercel's serverless PHP support

## Project Structure
- `/api`: Contains Vercel-compatible PHP files
- `/Brhom`: Original project files

## Database
You'll need to import the SQL dump (`itsshoot_brhom.sql`) to your database before deployment. 