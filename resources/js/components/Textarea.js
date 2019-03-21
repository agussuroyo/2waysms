import React from 'react';

class Textarea extends React.Component {
    render(){
        return (<textarea className={this.props.class} rows={this.props.rows} onChange={this.props.onChange} defaultValue={this.props.value}></textarea>)
    }
}

Textarea.defaultProps = {
    'class': 'form-control',
    'rows': 10,
    value: ''
}

export default Textarea;