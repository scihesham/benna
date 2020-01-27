<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
  body { font-family: DejaVu Sans, sans-serif; direction: rtl; text-align: right }
    #title{width: 100%; text-align: center}
    #title h4{ color: red}
</style>
    
	<title>invoice</title>

</head>
<body>
	<div id="title">
        <h2>فاتورة  {{$invoice->offer->project->title}}</h2>
        <h4>({{$invoice->offer->project->id}})</h4>
    </div>
    
    <p>
    يسعدنا ابلاغكم انه قد تم ارساء مشروع {{$invoice->offer->project->title}}
        بقيمه اجماليه {{$invoice->offer->milestones->sum('value')}}
        ريال سعودي وبذلك تكون عموله الموقع هى
        {{$invoice->offer->milestones->sum('value') *  0.01}}
    ريال سعودي    

    </p>
    

</body>
</html>