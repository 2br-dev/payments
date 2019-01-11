<!DOCTYPE html>
{strip}
<html lang="{$_page.lang}">
<head>
	<title>{$_page.title}</title>
	<meta content="author" name="serhserhserh">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	{* type   = 'inline' *}
	{if isset($pagination.prev) && $pagination.prev !== ''}
		<link rel="prev" href="?page={$pagination.prev}">
	{/if}
	{if isset($pagination.next) && $pagination.next !== ''}
		<link rel="next" href="?page={$pagination.next}">
	{/if}

	<!-- CSS -->
	<link type="text/css" rel="stylesheet" href="/css/normalize.css" >
	<link type="text/css" rel="stylesheet" href="/css/style.css" >
  {if $uri[0] == 'pechat-aktov-schetov'}
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  {/if}
	
	<link rel="icon" href="/img/favicon.png" type="image/x-icon">

</head>
<body class="page-{$_page.system}">
{/strip}