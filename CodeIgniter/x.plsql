DECLARE  
v_used_bytes NUMBER(10); 
v_allocated_bytes NUMBER(10);
BEGIN
   DBMS_SPACE.CREATE_TABLE_COST(
    tablespace_name=>'USERS',
    avg_row_size=>120,
    row_count=>1000000,
    pct_free=>20,
   used_bytes=>v_used_bytes,
   alloc_bytes=>v_allocated_bytes);
 
   DBMS_OUTPUT.PUT_LINE('used = ' || v_used_bytes || ' bytes  ' ||
 'allocated = ' || v_allocated_bytes || ' bytes');
 END;