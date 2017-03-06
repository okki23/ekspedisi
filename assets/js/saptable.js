/*
 * 
 * Sapta-table
 * By Sapta Marga Helmy
 * 
 * Simple Ajax Table
 * Selasa, 30 Januari 2017
 * Jakarta Timur
 */

$.fn.extend(
        {
            url: '',
            idElement: '',
            rows: '',
            allRows: '',
            activePage: 0,
            cSearch: {},
            formatters: function () {},
            _this: '',
            sapTable: function (options) {
                _this = this;

                var settings = $.extend({
                    url: "",
                    formatters: function () {},
                    cSearch: {},
                    getAllRows: null,
                    countLimit: [10, 25, 50, 75, 100],
                    showPagination: false,
                    showSearch: false
                }, options);

                idElement = ($(_this).attr('id'));
                var elementID = idElement;
                
                url = settings.url;
                var urlID = url;
                formatters = settings.formatters;
                cSearch = settings.cSearch;

                var table = $("#" + idElement).addClass('sapTable');
                var tbody = $('#' + idElement + ' tbody');
                var row = '';
                
                $.getJSON(url, function (data) {
                    $.each(data.rows, function (key, val) {
                        row = $('<tr></tr>');
                        $.map(val, function (dt) {
                            var rowData = $('<td></td>').addClass('rowTable').text(dt);
                            row.append(rowData);
                        })
                        rows = val;

                        if (typeof formatters == 'function') {
                            var rowAdd = function (key, row) {
                                val = row;
                                var formatAdd = options.formatters.call(this);
                                return $('<td></td>').addClass('rowTable').html(formatAdd);
                            }
                            row.append(rowAdd);
                        }
                        tbody.append(row);
                    });
                    
                    //urlID
                    //console.log(elementID);
                    
                    // Get Data For Display Records
                    $.fn.recordTable(data, elementID);

                    // For Display Pagination
                    $.fn.showPagination(data, elementID);
                    
                });

                // Set allRows to Get All Rows Data
                allRows = settings.getAllRows;

                // Set Search Table
                this.search_sapTable(elementID, urlID);

                // Set Display Records
                this.showRecordTable(settings.countLimit, elementID);

                _this.getColumn(elementID);

                return false;
            },
            refresh_sapTable: function (options) {
                var elementID = $(this).attr("id");

                var table = $("#" + elementID).addClass('sapTable');
                var tbody = $('#' + elementID + ' tbody');

                var settings = $.extend({
                    url: ""
                }, options);

                if (settings.url != "") {
                    url = settings.url
                }

                tbody.empty();

                var row = '';
                $.getJSON(url, function (data) {
                    $.each(data.rows, function (key, val) {
                        row = $('<tr></tr>');
                        $.map(val, function (dt) {
                            var rowData = $('<td></td>').addClass('rowTable').text(dt);
                            row.append(rowData);
                        })
                        rows = val;

                        if (typeof formatters == 'function') {
                            var rowAdd = function (key, row) {
                                val = row;
                                var formatAdd = formatters;
                                return $('<td></td>').addClass('rowTable').html(formatAdd);
                            }
                            row.append(rowAdd);
                        }
                        tbody.append(row);
                    });
                    $.fn.recordTable(data, elementID);
                    $.fn.showPagination(data, elementID);
                });


            },
            getRecord: function (data) {
                return data;
            },
            recordTable: function (data, elementID) {
                $.fn.allRows = data;
                var climit = $("select[name='" + elementID + "_length']").val();

                var cClass = elementID + "_cRowCount";
                $('body').find("." + cClass).remove();

                var recordTbl = '<div class="col-md-6 col-xs-12 pull-left ' + cClass + '">\n\
                    <span class="sRowCount">Show ' + (parseInt(data.current) + 1) + ' to ' + data.rowCount + ' of ' + data.total + ' entries</span>\n\
                </div>';

                $(recordTbl).insertAfter("#" + elementID);
            },
            showRecordTable: function (countLimit, elementID) {
                var showRecordTbl = '<div class="col-md-6 col-xs-12 pull-left">\n\
                        <div class="col-md-1 col-xs-4">Show</div><div class="col-md-4 col-xs-4">\n\
                        <select name="' + elementID + '_length" class="form-control">';
                $.each(countLimit, function (key, data) {
                    showRecordTbl += '<option value="' + data + '">' + data + '</option>';
                });
                showRecordTbl += '</select></div>\n\
                        <div class="col-md-4 col-xs-4">Entries</div>\n\
                        </div>';
                $(showRecordTbl).insertBefore("#" + elementID);

                _this = this;
                $("select[name='" + elementID + "_length']").change(function () {
                    var idSelect = $('#' + elementID + '_search_param').val();
                    var searchParam = $("input[name='" + elementID + "_sparam']").val();
                    var climit = $(this).val();

                    // Set Params For Search or Pagination or Show Entries
                    var sParams = [];
                    sParams['idSelect'] = idSelect;
                    sParams['searchParam'] = searchParam;
                    sParams['climit'] = climit;
                    sParams['cOffset'] = 0;
                    _this.search_proses(sParams);
                })
            },
            search_proses: function (params, elementID, urlID) {
                var search_url = urlID + "?field=" + params['idSelect'] + "&value=" + params['searchParam'] + "&climit=" + params['climit'] + "&cOffset=" + params['cOffset'];
                //console.log(urlID);
                var table = $("#" + elementID).addClass('sapTable');
                var tbody = $('#' + elementID + ' tbody');

                tbody.empty();

                var row = '';
                $.getJSON(search_url, function (data) {
                    $.each(data.rows, function (key, val) {
                        row = $('<tr></tr>');
                        $.map(val, function (dt) {
                            var rowData = $('<td></td>').addClass('rowTable').text(dt);
                            row.append(rowData);
                        })
                        rows = val;

                        if (typeof formatters == 'function') {
                            var rowAdd = function (key, row) {
                                val = row;
                                var formatAdd = formatters;
                                return $('<td></td>').addClass('rowTable').html(formatAdd);
                            }
                            row.append(rowAdd);
                        }
                        tbody.append(row);
                    });
                    $.fn.recordTable(data, elementID);
                    $.fn.showPagination(data, elementID);
                });

            },
            search_sapTable: function (elementID, urlID) {
                var searchHtml = '<div class="col-md-6 col-xs-12 pull-right">\n\
                        <div class="input-group"> \n\
                            <div class="input-group-btn search-panel">\n\
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">\n\
                                    <span id="search_concept">Filter by</span> <span class="caret"></span>\n\
                                </button>\n\
                                <ul class="dropdown-menu search_sapTable" role="menu">';
                $.map(cSearch, function (dt, key) {
                    searchHtml += '<li><a href="#' + key + '">' + dt + '</a></li>';
                });

                searchHtml += '</ul>\n\
                            </div>\n\
                            <input type="hidden" name="search_param" value="all" id="' + elementID + '_search_param">\n\
                            <input type="text" class="form-control" name="' + elementID + '_sparam" class="' + elementID + '_sparam" placeholder="Search term..." disabled>\n\
                        </div>\n\
                    </div>';
                $(searchHtml).insertBefore("#" + elementID);

                $('.search-panel .dropdown-menu').find('a').click(function (e) {
                    e.preventDefault();
                    var param = $(this).attr("href").replace("#", "");
                    var concept = $(this).text();
                    $('.search-panel span#search_concept').text(concept);
                    $('#' + elementID + '_search_param').val(param);
                    if (param != "") {
                        $("input[name='" + elementID + "_sparam']").removeAttr('disabled');
                    }
                });

                _this = this;
                $("input[name='" + elementID + "_sparam']").focusout(function () {
                    var idSelect = $('#' + elementID + '_search_param').val();
                    var searchParam = $(this).val();
                    
                    var climit = $("select[name='" + elementID + "_length']").val();

                    // Set Params For Search or Pagination or Show Entries
                    var sParams = [];
                    sParams['idSelect'] = idSelect;
                    sParams['searchParam'] = searchParam;
                    sParams['climit'] = climit;
                    sParams['cOffset'] = 0;
                    _this.search_proses(sParams, elementID, urlID);
                })
            },
            showPagination: function (allRows, elementID) {
                //console.log(elementID);
                $("." + elementID + "_paging").remove();

                var pagHtml = '<div class="col-md-6 col-xs-12 pull-right text-right ' + elementID + '_paging">';
                pagHtml += '</div>';

                $(pagHtml).insertAfter("#" + elementID);

                _this.pagination({
                    itemsPerPage: allRows.rowCount,
                    itemsToPaginate: allRows.total,
                    paginationContainer: '.' + elementID + '_paging'
                });
            },
            pagination: function (options) {
                var paginationContainer;
                var itemsToPaginate = this;
                var defaults = {
                    itemsPerPage: 5
                };
                var settings = {};
                $.extend(settings, defaults, options);

                var itemsPerPage = settings.itemsPerPage;

                paginationContainer = $(settings.paginationContainer);

                itemsToPaginate = $(settings.itemsToPaginate);

                var numberOfPaginationLinks = Math.ceil(parseInt(itemsToPaginate[0]) / parseInt(itemsPerPage));
                //console.log(itemsPerPage);

                $("<ul class='pagination'></ul>").prependTo(paginationContainer);

                for (var index = 0; index < numberOfPaginationLinks; index++) {
                    if ((_this.activePage - 1) == index) {
                        paginationContainer.find("ul").append("<li class='active'><a href='javascript:void(0)' onclick='_this.getPage(" + (index + 1) + ")'>" + (index + 1) + "</a></li>");
                    } else {
                        // Get Page For Data
                        paginationContainer.find("ul").append("<li><a href='javascript:void(0)' onclick='_this.getPage(" + (index + 1) + ")'>" + (index + 1) + "</a></li>");
                    }
                }

                itemsToPaginate.filter(":gt(" + (itemsPerPage - 1) + ")").hide();

                paginationContainer.find("ul li").on('click', function () {

                    var linkNumber = $(this).text();

                    var itemsToHide = itemsToPaginate.filter(":lt(" + ((linkNumber - 1) * itemsPerPage) + ")");
                    //console.log(((linkNumber - 1) * itemsPerPage));

                    $.merge(itemsToHide, itemsToPaginate.filter(":gt(" + (linkNumber * itemsPerPage - 1) + ")"));
                    itemsToHide.hide();

                    var itemsToShow = itemsToPaginate.not(itemsToHide);
                    itemsToShow.show();

                });


            },
            getPage: function (nomor) {
                _this.activePage = nomor;
                var idSelect = $('#' + idElement + '_search_param').val();
                var searchParam = $("input[name='" + idElement + "_sparam']").val();
                var climit = $("select[name='" + idElement + "_length']").val();

                // Set Params For Search or Pagination or Show Entries
                var sParams = [];
                sParams['idSelect'] = idSelect;
                sParams['searchParam'] = searchParam;
                sParams['climit'] = climit;
                sParams['cOffset'] = ((nomor - 1) * climit);
                _this.search_proses(sParams);
            },
            getColumn: function (elementID) {
                var columnHeader = $("#" + elementID + " thead tr th").data('options');
                var columnOptions = $("#" + elementID + " thead").find('th').data('options');
                var list = $("#" + elementID + " thead tr th").map(function () {
                    return $(this).data("options");
                }).get();

                //console.log(list.length);
            },
            pagination2: function (options) {
                var paginationContainer;
                var itemsToPaginate = this;
                var defaults = {
                    itemsPerPage: 5
                };
                var settings = {};
                $.extend(settings, defaults, options);

                var itemsPerPage = settings.itemsPerPage;

                //paginationContainer = $(settings.paginationContainer);
                itemsToPaginate = $(settings.itemsToPaginate);
                var numberOfPaginationLinks = Math.ceil(itemsToPaginate.lenght / itemsPerPage);

                $("<ul></ul>").prependTo(paginationContainer);

                for (var index = 0; index < numberOfPaginationLinks; index++) {
                    paginationContainer.find("ul").append("<li>" + (index + 1) + "</li>");
                }

                itemsToPaginate.filter(":gt(" + (itemsPerPage - 1) + ")").hide();

                paginationContainer.find("ul li").on('click', function () {

                    var linkNumber = $(this).text();
                    var itemsToHide = itemsToPaginate.filter(":lt(" + ((linkNumber - 1) * itemsPerPage) + ")");
                    $.merge(itemsToHide, itemsToPaginate.filter(":gt(" + (linkNumber * itemsPerPage - 1) + ")"));
                    itemsToHide.hide();

                    var itemsToShow = itemsToPaginate.not(itemsToHide);
                    itemsToShow.show();

                });

            }
        }
);

function joinObj(data) {
    var joinedClasses = $.map(data, function (e) {
        return e;
    }).join(' ');
    return joinedClasses;
}

 