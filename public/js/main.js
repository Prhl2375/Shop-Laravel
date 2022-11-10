function explode( delimiter, string ) {	// Split a string by string
    //
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: kenneth
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)

    var emptyArray = { 0: '' };

    if ( arguments.length != 2
        || typeof arguments[0] == 'undefined'
        || typeof arguments[1] == 'undefined' )
    {
        return null;
    }

    if ( delimiter === ''
        || delimiter === false
        || delimiter === null )
    {
        return false;
    }

    if ( typeof delimiter == 'function'
        || typeof delimiter == 'object'
        || typeof string == 'function'
        || typeof string == 'object' )
    {
        return emptyArray;
    }

    if ( delimiter === true ) {
        delimiter = '1';
    }

    return string.toString().split ( delimiter.toString() );
}


function currencyChange(obj){
    let data = "currency=" + obj.value;
    document.cookie = data;
    console.log(document.cookie.toString());
    location.reload();
}


function ajaxNewSection(url){
    fetch(url, {
        method: 'get',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    }).then((response) => {
        response.text().then((text) => {
            document.getElementById("section").innerHTML = text;
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        })
    })
}

function paginationClick(value){
    if(value){
        const url = new URL(value);
        const queryUrl = new URL(window.location);
        queryUrl.searchParams.forEach((value, key, parent) => {
            if(key != 'page'){
                url.searchParams.set(key, value);
            }
        });
        queryUrl.searchParams.set('page', url.searchParams.get('page'));
        history.pushState({}, null, queryUrl);
        console.log(window.location.pathname.split('/')[1]);
        ajaxNewSection(url);
    }
}

function searchSubmit(){
    let searchText = document.getElementById("q").value;
    if(searchText){
        if(window.location.pathname.split('/')[1] == 'catalog'){
            searchText = encodeURIComponent(searchText);
            const url = new URL(window.location);
            url.searchParams.set('search', searchText);
            url.searchParams.set('page', 1);
            history.pushState({}, null, url);
            ajaxNewSection(url);
        }else{
            const url = new URL('http://127.0.0.1:8000/catalog');
            url.searchParams.set('search', searchText);
            url.searchParams.set('page', 1);
            window.location = url;
        }
    }
    return false;
}
