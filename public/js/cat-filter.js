



var orginalParams = params_builder(queries);


function showMax(tag) {
  let selectedId = tag.selectedIndex;
  let showVal = tag.children[selectedId].value;
  let target_url = url_builder(orginalParams, sortBy, showVal, 1 , q);
  window.location.href = target_url;
}


function sortby(tag) {
  let selectedId = tag.selectedIndex;
  let sortVal = tag.children[selectedId].value;
  let target_url = url_builder(orginalParams, sortVal, showPerPage, 1 , q);
  window.location.href = target_url;
}



function arrayRemove(arr, value) {
  return arr.filter(function (ele) {
    return ele != value;
  });
}



function attrFilter(tag, id) {

  let attrGroup = tag.getAttribute('data-group');
  let attrValue = parseInt(tag.value);

  if (queries.hasOwnProperty(attrGroup)) {

    if (queries[attrGroup].includes(attrValue)) {
      queries[attrGroup] = arrayRemove(queries[attrGroup], attrValue);
      console.log(queries[attrGroup].length);
      if (queries[attrGroup].length == 0) {
        delete queries[attrGroup];
      }
    } else {
      queries[attrGroup].push(attrValue)
    }
  } else {
    queries[attrGroup] = [attrValue];
  }

  let params = params_builder(queries);
  let target_url = url_builder(params , sortBy , showPerPage , 1);
 
  window.location.href = target_url;

}



function params_builder(params) {

  let target = '';
  let i = 0;
  let k = 0;


  Object.keys(params).forEach(function (key) {
    i++;
    target += key + "=";
    params[key].forEach(($val) => {
      k++;
      target += $val;
      if (k < params[key].length) {
        target += ",";
      }
    });

    if (i < Object.keys(params).length) {
      target += '&'
    }
    k = 0;
  });
  
  return target;
}


function url_builder(params, sortby = 'newest', show = 16, page = 1 , q = '') {

  let sortbyTitle = (params == '') ? "sortby=" : "&sortby=";

  if(q == ''){
    var target_url = current_url + "?" + params + sortbyTitle + sortby + "&show=" + show + "&page=" + page;
  }else{
    var target_url = current_url + "?q=" + q + "&" + params + sortbyTitle + sortby + "&show=" + show + "&page=" + page;
  }
  console.log(target_url);
  return target_url;
}





